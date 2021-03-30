<div class="card">
    <h5 class="card-header">Edit Success Criteria</h5>
    <div class="card-body">
        <form method="POST" action="<?= base_url('coaches/home/edit_successcriteria'); ?>">
            <div class="form-floating">
                <textarea class="form-control" rows="5" name="success_criteria" placeholder="Update success criteria" id="floatingTextarea"><?= $edit_criteria['success_criteria']; ?></textarea>
            </div>
            <input type="text" hidden name="id_goals" value="<?= $edit_criteria['id_goals']; ?>">
            <input type="text" hidden name="id_criteria" value="<?= $edit_criteria['id_success_criteria'] ?>">

            <br>
            <a href="<?= $this->agent->referrer(); ?>" class="btn btn-danger">Kembali ke menu sebelumnya</a>
            <button type="submit" class="btn btn-primary">Simpan success criteria</button>
        </form>
    </div>
</div>