import os
import pathlib

from dotenv import load_dotenv


def get_project_root():
    return pathlib.Path(__file__).parent.parent.parent


def get_views_path():
    return os.path.join(pathlib.Path(__file__).parent.parent, "views")


def get_env_path():
    return os.path.join(get_project_root(), ".env")


def load_env():
    load_dotenv(get_env_path())


load_env()


def get_sqlite_connection_params():
    return "sqlite:///appDB.db"


def get_app_host():
    return os.environ.get("APP_HOST")


def get_app_port():
    return int(os.environ.get("APP_PORT"))


def get_secret_key():
    return os.environ.get("SECRET_KEY")


if __name__ == "__main__":
    print(get_project_root())
