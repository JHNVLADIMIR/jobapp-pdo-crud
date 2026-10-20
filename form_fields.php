<div class="grid">
  <div class="field"><label>First Name</label>
    <input type="text" name="first_name" placeholder="John" value="<?= h($a['first_name'] ?? '') ?>" required></div>
  <div class="field"><label>Last Name</label>
    <input type="text" name="last_name" placeholder="Rosello" value="<?= h($a['last_name'] ?? '') ?>" required></div>
  <div class="field"><label>Email</label>
    <input type="email" name="email" placeholder="name@email.com" value="<?= h($a['email'] ?? '') ?>" required></div>
  <div class="field"><label>Phone</label>
    <input type="text" name="phone" placeholder="09XX XXX XXXX" value="<?= h($a['phone'] ?? '') ?>"></div>
  <div class="field"><label>Position Applied</label>
    <select name="position_applied" required>
      <?php foreach (['SOC Analyst','Penetration Tester','Security Engineer','Network Security Admin','Incident Responder'] as $p): ?>
        <option <?= (($a['position_applied'] ?? '') === $p) ? 'selected' : '' ?>><?= $p ?></option>
      <?php endforeach; ?>
    </select></div>
  <div class="field"><label>Years of Experience</label>
    <input type="number" name="years_experience" min="0" placeholder="0" value="<?= h($a['years_experience'] ?? '') ?>"></div>
  <div class="field full"><label>Certifications</label>
    <input type="text" name="certifications" placeholder="e.g. CEH, Security+, CompTIA Network+" value="<?= h($a['certifications'] ?? '') ?>"></div>
</div>
