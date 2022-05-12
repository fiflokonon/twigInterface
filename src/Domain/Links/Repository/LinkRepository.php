<?php

namespace App\Domain\Links\Repository;

use PDO;

/**
 * Repository.
 */
final class LinkRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert link row.
     *
     * @param array $link The user
     *
     * @return int The new ID
     */
    public function insertLink(array $link): int
    {
        $row = [
            'name' => $link['name'],
            'link' => $link['link'],
        ];

        $sql = "INSERT INTO links SET 
                name=:name , 
                link=:link;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }

    /**
     * Get the list of links
     * @return bool
     */

    public function getLinks(): array
    {
        $sql = "SELECT * FROM links";
        $stmt= $this->connection->query($sql);
        if ($stmt) {
            return $stmt->fetchAll();
        }
        else{
            return json_encode(["message" => "An error occurs"]);
        }
    }

}