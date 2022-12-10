import datetime

from mvc.models import Note
from mvc.models.base import db


class NoteRepository:

    def __init__(self):
        pass

    @staticmethod
    def get_all(note_user_id):
        return db.session.execute(db.select(Note).filter(Note.note_user_id == note_user_id)).scalars()

    @staticmethod
    def get(note_id, note_user_id):
        return db.session.execute(db.select(Note).filter(Note.note_user_id == note_user_id,
                                                         Note.id == note_id)).scalar()

    @staticmethod
    def create(note_user_id, title, description):
        note = Note(note_user_id=note_user_id, title=title, description=description)
        db.session.add(note)
        db.session.commit()
        return note

    @staticmethod
    def update(note_id, note_user_id, title, description):
        print(note_id, note_user_id)
        note = NoteRepository.get(note_id, note_user_id)
        print(note)
        if note:
            note.title = title
            note.description = description
            note.updated_timestamp = datetime.datetime.now()
            db.session.add(note)
            db.session.commit()
            return note

    @staticmethod
    def delete(note_id, note_user_id):
        note = NoteRepository.get(note_id, note_user_id)
        if note:
            db.session.delete(note)
            db.session.commit()
            return note
