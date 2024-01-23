document.addEventListener('DOMContentLoaded', () => {
  const noteForm = document.getElementById('noteForm');
  const notesList = document.getElementById('notesList');

  async function fetchNotes() {
    try {
      const response = await fetch('/api/notes');
      const notes = await response.json();
      displayNotes(notes);
    } catch (error) {
      console.error(error);
    }
  }

  async function addNote() {
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;

    try {
      const response = await fetch('/api/notes', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ title, content }),
      });

      const newNote = await response.json();
      displayNotes([newNote]);
    } catch (error) {
      console.error(error);
    }
  }

  function displayNotes(notes) {
    notesList.innerHTML = '';
    notes.forEach(note => {
      const li = document.createElement('li');
      li.textContent = `${note.title}: ${note.content}`;
      notesList.appendChild(li);
    });
  }

  // Fetch existing notes on page load
  fetchNotes();
});

