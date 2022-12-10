from flask import Blueprint, render_template, send_from_directory

from mvc.repositories.fake_note import FakeNoteRepository
from mvc.utils.base import get_image_path
from mvc.utils.plots import render_pie, render_scatter, render_hist

statistic = Blueprint('statistic', __name__)
fkr = FakeNoteRepository()


@statistic.route('/',  methods=["GET"])
def statistic_page():
    fake_notes = fkr.get_fake_notes()
    graphics_names = [
        render_pie(fake_notes),
        render_hist(fake_notes),
        render_scatter(fake_notes)
    ]
    return render_template("statistic/list.html", fake_notes=fake_notes, graphics_names=graphics_names)


@statistic.route('/<filename>')
def upload_graphic(filename):
    return send_from_directory(get_image_path(), filename)
