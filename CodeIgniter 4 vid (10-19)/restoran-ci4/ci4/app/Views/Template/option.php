<select name="kategori" id="">
    <?php foreach ($kategori as $key => $value): ?>
        <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
    <?php endforeach; ?>
</select>