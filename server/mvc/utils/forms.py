from flask_wtf import FlaskForm
from wtforms import StringField, PasswordField, SubmitField, IntegerField, SelectField, EmailField
from wtforms.validators import DataRequired


class LoginForm(FlaskForm):
    email = EmailField("Почта", validators=[DataRequired()], render_kw={"class": "form-control"})
    password = PasswordField("Пароль", validators=[DataRequired()], render_kw={"class": "form-control"})
    submit = SubmitField('Войти', render_kw={"class": "btn btn-primary"})


class RegisterForm(FlaskForm):
    nickname = StringField("Имя", validators=[DataRequired()], render_kw={"class": "form-control"})
    email = EmailField("Почта", validators=[DataRequired()], render_kw={"class": "form-control"})
    password = PasswordField("Пароль", validators=[DataRequired()], render_kw={"class": "form-control"})
    submit = SubmitField('Зарегистрироваться', render_kw={"class": "btn btn-primary"})
