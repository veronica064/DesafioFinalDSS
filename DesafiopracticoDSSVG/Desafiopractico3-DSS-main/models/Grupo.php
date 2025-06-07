<?php
// models/Grupo.php
class Grupo {
    private $conn;
    private $table = 'grupos';
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function crear($nombre, $codigo_tutor) {
        $query = "INSERT INTO " . $this->table . " (nombre, codigo_tutor) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $codigo_tutor]);
    }
    
    public function obtenerTodos() {
        $query = "SELECT g.*, t.nombres, t.apellidos FROM " . $this->table . " g 
                  INNER JOIN tutores t ON g.codigo_tutor = t.codigo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtenerPorTutor($codigo_tutor) {
        $query = "SELECT * FROM " . $this->table . " WHERE codigo_tutor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$codigo_tutor]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function asignarEstudiante($grupo_id, $codigo_estudiante) {
        $query = "INSERT INTO grupo_estudiantes (grupo_id, codigo_estudiante) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$grupo_id, $codigo_estudiante]);
    }
    
    public function eliminar($id) {
        // Primero eliminar estudiantes del grupo
        $query = "DELETE FROM grupo_estudiantes WHERE grupo_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        
        // Luego eliminar el grupo
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    // 🔹 Nuevo método agregado
    public function obtenerEstudiantesAsignados($grupo_id) {
        $query = "SELECT codigo_estudiante FROM grupo_estudiantes WHERE grupo_id = :grupo_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':grupo_id', $grupo_id);
        $stmt->execute();

        $estudiantes = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $estudiantes[] = $row['codigo_estudiante'];
        }

        return $estudiantes;
    }
}
?>
