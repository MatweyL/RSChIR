import datetime

from flask_login import UserMixin

from mvc.models.base import db, Base


class NoteUser(db.Model, Base, UserMixin):
    id = db.Column(db.Integer, primary_key=True, autoincrement=True)
    nickname = db.Column(db.String(32), nullable=False)
    password = db.Column(db.String(128), nullable=False)
    email = db.Column(db.String(64), nullable=False, unique=True)
    created_timestamp = db.Column(db.DateTime, default=datetime.datetime.utcnow())
