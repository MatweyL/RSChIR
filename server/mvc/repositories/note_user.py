from werkzeug.security import generate_password_hash

from mvc.models import NoteUser
from mvc.models.base import db


class NoteUserRepository:

    def __init__(self):
        pass

    @staticmethod
    def create(form):
        password = generate_password_hash(form.password.data)
        new_user = NoteUser(nickname=form.nickname.data, email=form.email.data, password=password)
        db.session.add(new_user)
        db.session.commit()

    @staticmethod
    def get_all():
        return db.session.execute(db.select(NoteUser)).scalars()

    @staticmethod
    def is_email_exist(email):
        return db.session.execute(db.select(NoteUser).filter(NoteUser.email == email)).all() is not None
