from flask import Flask

from mvc.controllers.auth import login_manager
from mvc.models.base import db
from mvc.utils.base import get_sqlite_connection_params, get_views_path, get_secret_key


def create_app():
    app = Flask(__name__,
                template_folder=get_views_path())
    app.config['SECRET_KEY'] = get_secret_key()
    app.config['SQLALCHEMY_DATABASE_URI'] = get_sqlite_connection_params()
    db.init_app(app)
    with app.app_context():
        db.create_all()
    login_manager.init_app(app)

    from mvc.controllers.common import common

    from mvc.controllers.auth import auth
    from mvc.controllers.note import note

    app.register_blueprint(common, url_prefix="/")
    app.register_blueprint(auth, url_prefix="/auth")
    app.register_blueprint(note, url_prefix="/note")

    return app


# TODO: CRUD заметки
# TODO: Загрузка PDF
# TODO: Графики
