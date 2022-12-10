from mvc import create_app
from mvc.utils.base import get_app_host, get_app_port, get_debug_state

if __name__ == "__main__":
    app = create_app()
    app.run(host=get_app_host(),
            port=get_app_port(),
            debug=True)
