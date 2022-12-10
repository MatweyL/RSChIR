from flask import Blueprint
from flask import redirect, render_template, request, url_for
from flask_login import login_required, login_user, logout_user, LoginManager
from werkzeug.security import check_password_hash, generate_password_hash

from mvc.models.base import db
from mvc.models.note_user import NoteUser
from mvc.utils.forms import RegisterForm, LoginForm
from mvc.repositories.note_user import NoteUserRepository

login_manager = LoginManager()


@login_manager.user_loader
def load_user(user_id):
    return NoteUser.query.get(user_id)


auth = Blueprint('auth', __name__)


@auth.route("/login", methods=["GET", "POST"])
def login():
    form = LoginForm()
    error = None
    if request.method == "POST" and form.validate_on_submit():
        user = NoteUser.query.filter_by(email=form.email.data).first()

        if user and check_password_hash(user.password, form.password.data):
            login_user(user)
            next_page = request.args.get('next')
            if not next_page:
                next_page = url_for("note.note_all")
            return redirect(next_page)
        else:
            error = 'Неверная пара логин/пароль'
    return render_template('auth/login.html', form=form, error=error)


@auth.route("/logout", methods=["GET", "POST"])
@login_required
def logout():
    logout_user()
    return redirect(url_for('auth.login'))


@auth.route("/register", methods=("GET", "POST"))
def register():
    form = RegisterForm()
    error = None
    if (request.method == 'POST' and
            form.validate_on_submit() and
            not NoteUserRepository.is_email_exist(email=form.email.data)):

        password = generate_password_hash(form.password.data)
        new_user = NoteUser(nickname=form.nickname.data, email=form.email.data, password=password)
        db.session.add(new_user)
        db.session.commit()
        return redirect(url_for('auth.login'))
    elif request.method == 'POST' and NoteUserRepository.is_email_exist(email=form.email.data):
        error = f"Пользователь с почтой '{form.email.data}' уже существует"
    return render_template('auth/register.html', form=form, error=error)

