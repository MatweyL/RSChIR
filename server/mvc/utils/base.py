import os
import pathlib

from dotenv import load_dotenv


def get_project_root():
    return pathlib.Path(__file__).parent.parent.parent


def get_views_path():
    return os.path.join(pathlib.Path(__file__).parent.parent, "views")


def get_upload_path():
    return os.path.join(pathlib.Path(__file__).parent.parent, "upload")


def get_static_path():
    return os.path.join(pathlib.Path(__file__).parent.parent, "static")


def get_image_path():
    return os.path.join(get_static_path(), 'image')


def get_env_path():
    return os.path.join(get_project_root(), ".env")


def load_env():
    load_dotenv(get_env_path())


load_env()


def get_sqlite_connection_params():
    return "sqlite:///appDB.db"


def get_db_url():
    return f"mysql://{os.environ.get('DB_USER')}:" \
           f"{os.environ.get('DB_PASSWORD')}@" \
           f"{os.environ.get('DB_HOST')}:" \
           f"{os.environ.get('DB_PORT')}/" \
           f"{os.environ.get('DB_NAME')}"


def get_app_host():
    return os.environ.get("APP_HOST")


def get_app_port():
    return int(os.environ.get("APP_PORT"))


def get_secret_key():
    return os.environ.get("SECRET_KEY")


def get_debug_state():
    return os.environ.get("DEBUG") if os.environ.get("DEBUG") else False


if __name__ == "__main__":
    print(get_project_root())
