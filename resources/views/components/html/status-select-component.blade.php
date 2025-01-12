@props(['value' => 'active'])
<div class="form-floating mb-3">
    <select class="form-control" id="status" name="status" required>
        <option value="active" @selected($value == 'active')>Active</option>
        <option value="inactive" @selected($value == 'inactive')>Inactive</option>
    </select>
    <label for="status">
        Select status <span class="text-danger">*</span>
    </label>
</div>
