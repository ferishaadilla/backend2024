const db = require("../config/database");

class Patient {
  static getAllPatients(callback) {
    const sql = "SELECT * FROM patients";
    db.query(sql, callback);
  }

  static getPatientById(id, callback) {
    const sql = "SELECT * FROM patients WHERE id = ?";
    db.query(sql, [id], callback);
  }

  static createPatient(data, callback) {
    const sql =
      "INSERT INTO patients (name, phone, address, status, in_date_at, out_date_at) VALUES (?, ?, ?, ?, ?, ?)";
    db.query(
      sql,
      [data.name, data.phone, data.address, data.status, data.in_date_at, data.out_date_at],
      callback
    );
  }

  static updatePatient(id, data, callback) {
    const sql =
      "UPDATE patients SET name = ?, phone = ?, address = ?, status = ?, in_date_at = ?, out_date_at = ? WHERE id = ?";
    db.query(
      sql,
      [data.name, data.phone, data.address, data.status, data.in_date_at, data.out_date_at, id],
      callback
    );
  }

  static deletePatient(id, callback) {
    const sql = "DELETE FROM patients WHERE id = ?";
    db.query(sql, [id], callback);
  }
}

module.exports = Patient;