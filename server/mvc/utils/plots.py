import os.path

import matplotlib.pyplot as plt

from mvc.repositories.fake_note import FakeNoteRepository
from mvc.utils.base import get_image_path


def render_pie(notes):
    stat = {}
    for note in notes:
        if stat.get(note.note_user_id):
            stat[note.note_user_id] += 1
        else:
            stat[note.note_user_id] = 1
    labels = []
    values = []
    for k, v in stat.items():
        labels.append(k)
        values.append(v)
    fig1, ax1 = plt.subplots()
    ax1.pie(values, labels=labels)
    path_to_graphic = os.path.join(get_image_path(), "pie.png")
    plt.savefig(path_to_graphic)
    plt.close()
    return "pie.png"


def render_hist(notes):
    weights = []
    for note in notes:
        weights.append(len(note.description))
    plt.hist(weights, bins=20)
    plt.xlabel('Количество заметок')
    plt.ylabel('Длина описания заметки')
    path_to_graphic = os.path.join(get_image_path(), "hist.png")
    plt.savefig(path_to_graphic)
    plt.close()
    return "hist.png"


def render_scatter(notes):
    titles_lengths = []
    description_lengths = []
    for note in notes:
        titles_lengths.append(len(note.title))
        description_lengths.append(len(note.description))
    plt.scatter(titles_lengths, description_lengths, facecolor='C0', edgecolor='k')
    plt.xlabel('Длина названия заметки')
    plt.ylabel('Длина описания заметки')
    path_to_graphic = os.path.join(get_image_path(), "scatter.png")
    plt.savefig(path_to_graphic)
    plt.close()
    return "scatter.png"


