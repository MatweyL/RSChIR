import datetime


from mvc.models.base import db, Base


class Note(db.Model, Base):
    id = db.Column(db.Integer, primary_key=True, index=True, autoincrement=True)
    note_user_id = db.Column(db.Integer, db.ForeignKey('note_user.id'), nullable=False)
    title = db.Column(db.String(64), nullable=False)
    description = db.Column(db.Text)
    updated_timestamp = db.Column(db.DateTime, default=datetime.datetime.utcnow())
    created_timestamp = db.Column(db.DateTime, default=datetime.datetime.utcnow())
