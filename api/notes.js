const { Pool } = require('pg');

const pool = new Pool({
  connectionString: process.env.DATABASE_URL,
  ssl: {
    rejectUnauthorized: false,
  },
});

module.exports = async (req, res) => {
  try {
    if (req.method === 'GET') {
      const result = await pool.query('SELECT * FROM notes');
      res.status(200).json(result.rows);
    } else if (req.method === 'POST') {
      const { title, content } = req.body;
      const result = await pool.query('INSERT INTO notes (title, content) VALUES ($1, $2) RETURNING *', [title, content]);
      res.status(201).json(result.rows[0]);
    } else {
      res.status(405).end(); // Method Not Allowed
    }
  } catch (error) {
    console.error(error);
    res.status(500).send('Internal Server Error');
  }
};

