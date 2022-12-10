from flask_wtf import FlaskForm
from flask_wtf.file import FileField
from wtforms import StringField, PasswordField, SubmitField, IntegerField, SelectField, EmailField
from wtforms.validators import DataRequired
from wtforms.widgets import TextArea


class LoginForm(FlaskForm):
    email = EmailField("Почта", validators=[DataRequired()], render_kw={"class": "form-control"})
    password = PasswordField("Пароль", validators=[DataRequired()], render_kw={"class": "form-control"})
    submit = SubmitField('Войти', render_kw={"class": "btn btn-primary"})


class RegisterForm(FlaskForm):
    nickname = StringField("Имя", validators=[DataRequired()], render_kw={"class": "form-control"})
    email = EmailField("Почта", validators=[DataRequired()], render_kw={"class": "form-control"})
    password = PasswordField("Пароль", validators=[DataRequired()], render_kw={"class": "form-control"})
    submit = SubmitField('Зарегистрироваться', render_kw={"class": "btn btn-primary"})


class _BaseNoteForm(FlaskForm):
    title = StringField("Заголовок", validators=[DataRequired()], render_kw={"class": "form-control"})
    description = StringField("Описание", validators=[DataRequired()], render_kw={"class": "form-control"}, widget=TextArea())


class CreateNoteForm(_BaseNoteForm):
    submit = SubmitField('Сохранить', render_kw={"class": "btn btn-primary"})


class UpdateNoteForm(_BaseNoteForm):
    note_id = IntegerField('note_id', render_kw={"class": "d-none"})
    submit = SubmitField('Обновить', render_kw={"class": "btn btn-primary"})


class UploadFileForm(FlaskForm):
    file = FileField('Файл')
    submit = SubmitField('Загрузить', render_kw={"class": "btn btn-primary"})
