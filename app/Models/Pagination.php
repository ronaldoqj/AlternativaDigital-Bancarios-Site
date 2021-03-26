<?php
namespace App\Models;

use Illuminate\Database\Query\Builder;

class Pagination
{
    public int $itemsPerPage = 10;
    public int $page = 1;
    public int $totalPages;
    public int $totalItems;
    public int $nextPage;
    public int $previousPage;
    public Array $items = [];
    private Builder $result;


    public function __construct(Builder $result = null)
    {
        if ( $result ) {
            $this->result = $result;
        }
    }

    public function setResult(Builder $result): void {
        $this->result = $result;
    }
    
    public function setPage(int $page): void {
        $this->page = $page;
    }

    public function get()
    {
        $result = $this->result;

        $result->take($this->itemsPerPage);

        $this->totalItems = $result->count();
        $this->totalPages = $this->getTotalPages($result);

        $result->skip($this->itemsPerPage * $this->page - $this->itemsPerPage);
        $this->items = $result->get()->toArray();
    }


    /**
     * Calculate Total Pages in Query Builder
     * 
     * @param Builder $result
     */
    private function getTotalPages(Builder $result): int
    {
        $totalPages = 1;

        if ( $result->count() > $this->itemsPerPage )
        {
            $totalPages = $result->count() / $this->itemsPerPage;

            if ( $result->count() % $this->itemsPerPage ) {
                $totalPages++;
            }
        }

        return $totalPages;
    }
}
