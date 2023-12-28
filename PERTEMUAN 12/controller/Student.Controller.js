// import model student
const Student = require("../models/student")

class StudentController {
    async index(req, res) {
        const students = await Student.all();

        const data = {
            message: "Menampilkan data student",
            data: students
        };

        res.status(200).json(data);
    }

    async store(req, res) {

        const { nama, nim, email, jurusan } = req.body
        const students = await Student.create(req.body);
        const data = {
            message: "Menambahkan data student",
            data: students
        };

        res.status(201).json(data);
    }


    update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;

        students[id] = nama;

        const data = {
            message: `Mengedit data students id ${id}, nama ${nama}`,
            data: students
        };

        res.json(data);
    }

    destroy(req, res) {
        const { id } = req.params;

        students.splice(id, 1);

        const data = {
            message: `Menghapus data students ${id}`,
            data: students
        };

        res.json(data);
    }
}

const object = new StudentController();

// export object
module.exports = object;