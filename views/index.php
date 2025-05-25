<?php require_once __DIR__ . '/layout/header.php'; ?>

<main>
  <h1>Agendamentos</h1>

  <section id="#agendamentos" class="section-agendamentos">

    <h2>Agendamentos Futuros</h2>
    <?php if (empty($future)): ?>
      <p>Nenhum agendamento futuro.</p>
    <?php else: ?>

      <?php foreach ($future as $a): ?>

        <div class="agendamento">
          <h3><?= htmlspecialchars($a['title']) ?></h3>
          <p><strong>Cliente:</strong> <?= htmlspecialchars($a['client_name']) ?></p>
          <p><strong>Início:</strong> <?= date('d/m/Y H:i', strtotime($a['start_date'])) ?></p>
          <p><strong>Fim:</strong> <?= date('d/m/Y H:i', strtotime($a['end_date'])) ?></p>
          <p><?= nl2br(htmlspecialchars($a['description'])) ?></p>
          
          <div class="actions">
            <a href="index.php?action=edit&id=<?= $a['id'] ?>">Editar</a>
            <a href="index.php?action=delete&id=<?= $a['id'] ?>">Excluir</a>
          </div>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>
  </section>



  <section class="section-agendamentos">

    <h2>Agendamentos Passados</h2>
    <?php if (empty($past)): ?>
      <p>Nenhum agendamento passado.</p>
    <?php else: ?>

      <?php foreach ($past as $a): ?>

        <div class="agendamento past">
          <h3><?= htmlspecialchars($a['title']) ?></h3>
          <p><strong>Cliente:</strong> <?= htmlspecialchars($a['client_name']) ?></p>
          <p><strong>Início:</strong> <?= date('d/m/Y H:i', strtotime($a['start_date'])) ?></p>
          <p><strong>Fim:</strong> <?= date('d/m/Y H:i', strtotime($a['end_date'])) ?></p>
          <p><?= nl2br(htmlspecialchars($a['description'])) ?></p>

          <div class="actions">
            <a href="index.php?action=edit&id=<?= $a['id'] ?>">Editar</a>
            <a href="index.php?action=delete&id=<?= $a['id'] ?>">Excluir</a>
          </div>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>
  </section>


  
  <section id="novo-age" class="section-novo-agendamento">
  <h2><?= isset($editAppointment) && $editAppointment ? 'Editar Agendamento' : 'Novo Agendamento' ?></h2>

  <form action="index.php?action=<?= isset($editAppointment) && $editAppointment ? 'update&id=' . $editAppointment['id'] : 'create' ?>" method="POST">
    
    <label for="title">Título:</label>
    <input type="text" name="title" id="title" required value="<?= isset($editAppointment) && $editAppointment ? htmlspecialchars($editAppointment['title']) : '' ?>">

    <label for="client_name">Cliente:</label>
    <input type="text" name="client_name" id="client_name" required value="<?= isset($editAppointment) && $editAppointment ? htmlspecialchars($editAppointment['client_name']) : '' ?>">

    <label for="start_date">Data/Hora Início:</label>
    <input type="datetime-local" name="start_date" id="start_date" required value="<?= isset($editAppointment) && $editAppointment ? date('Y-m-d\TH:i', strtotime($editAppointment['start_date'])) : '' ?>">

    <label for="end_date">Data/Hora Fim:</label>
    <input type="datetime-local" name="end_date" id="end_date" required value="<?= isset($editAppointment) && $editAppointment ? date('Y-m-d\TH:i', strtotime($editAppointment['end_date'])) : '' ?>">

    <label for="description">Descrição:</label>
    <textarea name="description" id="description"><?= isset($editAppointment) && $editAppointment ? htmlspecialchars($editAppointment['description']) : '' ?></textarea>

    <button type="submit"><?= isset($editAppointment) && $editAppointment ? 'Atualizar' : 'Salvar' ?></button>

    <?php if (isset($editAppointment) && $editAppointment): ?>
      <a href="index.php">Cancelar</a>
    <?php endif; ?>
    
  </form>
</section>
</main>
<script>
  document.querySelectorAll('a[href*="action=delete"]').forEach(link => {
    link.addEventListener('click', function (e) {
      if (!confirm('Tem certeza que deseja excluir este agendamento?')) {
        e.preventDefault();
      }
    });
  });

  window.addEventListener('DOMContentLoaded', () => {
    const formSection = document.querySelector('.section-novo-agendamento');
    const title = formSection.querySelector('h2');
    const isEditing = title.textContent.includes('Editar');

    if (isEditing) {
      title.style.backgroundColor = '#facc15'; 
      title.style.color = 'black'; 
      title.style.padding = '10px 15px';
      title.style.borderRadius = '8px';
    }
  });

</script>

