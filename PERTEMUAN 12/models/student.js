// import database
const db = require("../config/database");

// membuat model student
class Student {
  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students";
      db.query(sql, (sql, results) => {
        resolve(results);
      });
    });
  }
  static create(Student) {
    return new Promise((resolve, reject) => {
      const sql = "INSERT INTO students VALUES('',?,?,?,?)";
      db.query(sql, Student, (err, results) => {
        if (err) reject(err);
        resolve(this.show(results.insertId));
      });
    });
  }

  static show(id) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM students WHERE id = ${id} `;
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  // mengupdate data student
  static async update(id, data) {
    await new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ? WHERE id = ?";
      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      });
    });
    // mencari data yang baru diupdate
    const student = await this.find(id);
    return student;
  }

  // menghapus data dari database
  static delete(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM students WHERE id = ?";
      db.query(sql, id, (err, results) => {
        resolve(results);
      });
    });
  }

  // mencari data berdasarkan id
  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students WHERE id = ?";
      db.query(sql, id, (err, results) => {
        // destructing array
        const [student] = results;
        resolve(student);
      });
    });
  }
}

// export model
module.exports = Student;
