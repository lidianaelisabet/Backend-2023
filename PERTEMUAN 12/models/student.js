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
            const sql = "INSERT INTO students SET ?";
            db.query(sql, Student, (err, results) => {
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


}

// export model
module.exports = Student;