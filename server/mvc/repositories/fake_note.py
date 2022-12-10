from faker import Faker

from mvc.models.fake_note import FakeNote


class FakeNoteRepository:

    def __init__(self):
        self.faker = Faker(['ru_RU'])

    def get_fake_notes(self, count=50):
        return [self.get_fake_note() for _ in range(count)]

    def get_fake_note(self):
        return FakeNote(
            self.faker.random.randint(0, 100000),
            self.faker.random.randint(0, 6),
            self.faker.sentence(),
            self.faker.text(),
            self.faker.date_time(),
            self.faker.date_time(),
        )


if __name__ == "__main__":
    fkr = FakeNoteRepository()
    print(fkr.get_fake_note())
