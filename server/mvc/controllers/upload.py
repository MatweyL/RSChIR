import os.path

from flask import Blueprint, render_template, send_from_directory, request, redirect, url_for
from werkzeug.utils import secure_filename

from mvc.utils.base import get_upload_path
from mvc.utils.forms import UploadFileForm

upload = Blueprint('upload', __name__)


@upload.get('/')
def get_upload_page():
    files = os.listdir(get_upload_path())
    files.remove(".gitkeep")
    print(files)
    return render_template("upload/list.html", files=files)


@upload.post('/')
def upload_file():
    uploaded_file = request.files['file']
    filename = secure_filename(uploaded_file.filename)
    if filename != '':
        file_extension = filename[filename.rfind('.') + 1:]
        if file_extension == "pdf":
            uploaded_file.save(os.path.join(get_upload_path(), filename))
    return get_upload_page()


@upload.get('/upload/<filename>')
def get_uploaded_file(filename: str):
    if os.path.exists(os.path.join(get_upload_path(), filename)):
        return send_from_directory(get_upload_path(), filename)
    else:
        return 404
