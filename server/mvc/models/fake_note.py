from faker import Faker


class FakeNote:

    def __init__(self, id, note_user_id, title, description, created_timestamp, updated_timestamp):
        self.id = id
        self.note_user_id = note_user_id
        self.title = title
        self.description = description
        self.created_timestamp = created_timestamp
        self.updated_timestamp = updated_timestamp

    def __repr__(self):
        return str(self.__dict__)
