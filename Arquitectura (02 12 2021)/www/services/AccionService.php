<?php
class AccionService
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM accion");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Accion();

                $alm->__SET('id', $r->id);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('descripcion', $r->descripcion);
                $alm->__SET('borrado', $r->borrado);


                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM alumnos WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Accion();

            $alm->__SET('id', $r->id);
            $alm->__SET('nombre', $r->nombre);
            $alm->__SET('descripcion', $r->descripcion);
            $alm->__SET('borrado', $r->borrado);


            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM accion WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Accion $data)
    {
        try 
        {
            $sql = "UPDATE accion SET 
                        nombre          = ?, 
                        descripcion        = ?,
                        borrado            = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre'), 
                    $data->__GET('descripcion'), 
                    $data->__GET('borrado'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Accion $data)
    {
        try 
        {
        $sql = "INSERT INTO accion (nombre,descripcion,borrado) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('nombre'), 
                $data->__GET('descripcion'), 
                $data->__GET('borrado')
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>
