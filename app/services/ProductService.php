namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll($filters)
    {
        return $this->repo->getAll($filters);
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }

    public function create($data)
    {
        if ($data['price'] <= 0 || $data['stock'] < 0) {
            throw new \Exception("Invalid values");
        }

        return $this->repo->create($data);
    }

    public function update($id, $data)
    {
        if (isset($data['price']) && $data['price'] < 0) {
            throw new \Exception("Price cannot be negative");
        }

        if (isset($data['stock']) && $data['stock'] < 0) {
            throw new \Exception("Stock cannot be negative");
        }

        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}