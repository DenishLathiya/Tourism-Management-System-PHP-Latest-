<section class="page-section" style="background: linear-gradient(135deg, #e3f0ff 0%, #f8fafc 100%); min-height:100vh;">
    <div class="container py-5">
        <h1 class="mb-4">My Booking Reports</h1>
        <hr class="border-warning mb-4">

        <table class="table table-striped table-bordered text-dark">
            <colgroup>
                <col width="5%">
                <col width="20%">
                <col width="25%">
                <col width="20%">
                <col width="15%">
            </colgroup>
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Date & Time</th>
                    <th>Package</th>
                    <th>Schedule</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                $qry = $conn->query("SELECT b.*, p.title 
                                      FROM book_list b 
                                      INNER JOIN packages p ON p.id = b.package_id 
                                      WHERE b.user_id ='".$_settings->userdata('id')."' 
                                      ORDER BY DATE(b.date_created) DESC");
                while($row = $qry->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo date("Y-m-d", strtotime($row['schedule'])) ?></td>
                        <td class="text-center">
                            <?php if($row['status'] == 0): ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php elseif($row['status'] == 1): ?>
                                <span class="badge badge-primary">Confirmed</span>
                            <?php elseif($row['status'] == 2): ?>
                                <span class="badge badge-danger">Cancelled</span>
                            <?php elseif($row['status'] == 3): ?>
                                <span class="badge badge-success">Done</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>
