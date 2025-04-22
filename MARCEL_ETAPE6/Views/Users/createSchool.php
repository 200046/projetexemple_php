<form>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Nom">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" id="adresse" name="adresse" placeholder="Adresse">
    </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville" placeholder="Ville">
    </div>
    <div class="form-group">
        <label for="code_postal">Code postal</label>
        <input type="text" id="code_postal" name="code_postal" placeholder="Code postal">
    </div>
    <div class="form-group">
        <label for="telephone">Numéro de téléphone</label>
        <input type="tel" id="telephone" name="telephone" placeholder="Numéro de téléphone">
    </div>
    <div class="form-group">
        <select name="options[]" id="options-select" multiple>
            <?php foreach ($options as $option) : ?>
                <option value="<?= $option->optionScolaireId ?>"><?= $option->nom ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image">
    </div>
    <button type="submit">Ajouter</button>
</form>
</div>