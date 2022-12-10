from flask import render_template, Blueprint, request, redirect, url_for
from flask_login import current_user, login_required

from mvc.repositories.note import NoteRepository
from mvc.utils.forms import CreateNoteForm, UpdateNoteForm

note = Blueprint('note', __name__)


@note.route('/',  methods=["GET"])
@login_required
def note_all():
    notes = NoteRepository.get_all(current_user.id)
    return render_template("note/list.html", notes=notes)


@note.route('/create', methods=["GET", "POST"])
@login_required
def note_create():
    form = CreateNoteForm()
    error = None
    if request.method == "POST" and form.validate_on_submit():
        NoteRepository.create(current_user.id,
                              form.title.data,
                              form.description.data)
        return redirect(url_for(".note_all"))
    else:
        error = 'Некорректный формат заметки'
    return render_template("note/create.html", form=form, error=error)


@note.route('/update', methods=["GET", "POST"])
@login_required
def note_update():
    note_id = request.args.get('note_id')
    form = UpdateNoteForm()
    error = None
    note_fetched = NoteRepository.get(note_id, current_user.id)
    if not note_fetched:
        redirect(url_for(".note_all"))
    if request.method == "POST" and form.validate_on_submit():
        NoteRepository.update(form.note_id.data,
                              current_user.id,
                              form.title.data,
                              form.description.data)
        return redirect(url_for(".note_all"))
    elif request.method == "GET":
        form.note_id.data = note_fetched.id
        form.title.data = note_fetched.title
        form.description.data = note_fetched.description
    else:
        error = 'Некорректный формат заметки'
    return render_template("note/update.html", form=form, error=error)


@note.route('/delete', methods=["GET"])
@login_required
def note_delete():
    note_id = request.args.get('note_id')
    NoteRepository.delete(note_id, current_user.id)
    return redirect(url_for(".note_all"))
