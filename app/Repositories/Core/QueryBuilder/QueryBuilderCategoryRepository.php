<?php


namespace App\Repositories\Core\QueryBuilder;

use Illuminate\Support\Str;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseQueryBuilderRepository;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    protected $table = 'categories';


    public function search(array $data)
    {
        return $this->db
            ->table($this->tb)
            ->where(function ($query) use ($data) {
                if (isset($data['title'])) {
                    $query->where('title', $data['title']);
                }

                if (isset($data['url'])) {
                    $query->orWhere('url', $data['url']);
                }

                if (isset($data['description'])) {
                    $desc = $data['description'];
                    $query->where('description', 'LIKE', "%{$desc}%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate();
    }

    public function productsByCategoryId(int $id)
    {
        return $this->db->table('products')
                    ->where('category_id', $id)
                    ->get();
    }

    public function store(array $data)
    {
        $data['url'] = Str::kebab($data['title']);
        return $this->db->table($this->tb)->insert($data);
    }

    public function update(int $id, array $data)
    {
        $data['url'] = Str::kebab($data['title']);
        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }
}
