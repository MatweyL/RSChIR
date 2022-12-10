from flask import render_template, Blueprint, request, redirect, url_for, jsonify
from flask_login import current_user

from mvc.repositories.note import NoteRepository
from mvc.utils.forms import CreateNoteForm, UpdateNoteForm

note = Blueprint('api/note', __name__)


@note.get('/')
def get_notes():
    if request.args.get('note_id') and request.args.get('note_user_id'):
        n = NoteRepository.get(request.args.get('note_id'), request.args.get('note_user_id'))
        return jsonify({"response": n})
    elif request.args.get('note_user_id'):
        notes = NoteRepository.get_all(current_user.id)
        return jsonify({"response": notes})
    else:
        return jsonify({"response": None})
