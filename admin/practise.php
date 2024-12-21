<!-- oporer code==================== -->
<?php
require '../classes/Pagination.php';

$pagination = new Pagination('localhost', 'root', '', 'e_commerce_site', 'brands');

// Pagination configuration
$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch data
$brands = $pagination->getData($limit, $offset);
$totalRows = $pagination->getTotalRows();
$totalPages = ceil($totalRows / $limit);
?>
<!-- =====================table code============================ -->

<tbody>
    <?php if (!empty($brands)): ?>
        <?php $sl = $offset + 1; ?>
        <?php foreach ($brands as $row): ?>
            <tr>
                <td><?= $sl++; ?></td>
                <td><?= $row['brandName']; ?></td>
                <td>
                    <a href="brand-edit.php?id=<?= $row['brandId']; ?>"><i class="fa-solid fa-pen-to-square btn-lg"></i></a>
                    <a onclick="return confirm('Are you sure?')" href="brand-delete.php?id=<?= $row['brandId']; ?>"> <i class="fa-solid fa-trash btn-lg"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3" class="text-center">Record Not Found</td>
        </tr>
    <?php endif; ?>
</tbody>



<!-- ==============Pagination এর জন্য নিচের কোড ব্যবহার করুন:================= -->
<!-- way-1 plane code -->
<div>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i; ?>"><?= $i; ?></a>
    <?php endfor; ?>
</div>
<!-- way- simple design with boothstrap-->
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
<!-- way-3 nice show with boosthrap -->
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($page == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($page == $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- way-4 akhane next and previosu add kora hoise -->
<div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <!-- Previous Button -->
            <li class="page-item <?= ($page == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= ($page - 1 > 0) ? $page - 1 : 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo; Previous</span>
                </a>
            </li>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <!-- Next Button -->
            <li class="page-item <?= ($page == $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= ($page + 1 <= $totalPages) ? $page + 1 : $totalPages; ?>" aria-label="Next">
                    <span aria-hidden="true">Next &raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>


<!-- ==========================Class file a Pagination code ========================= -->
<?php
class Brand
{
    private $conn;
    private $table;

    public function __construct($host, $user, $pass, $dbname, $table)
    {
        $this->table = $table;
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function getData($limit, $offset)
    {
        $query = "SELECT * FROM $this->table LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalRows()
    {
        $query = "SELECT COUNT(*) as total FROM $this->table";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
