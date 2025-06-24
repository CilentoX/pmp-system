<li class="nav-item"><?= $this->Html->link('<i class="fas fa-child"></i> <p>Aulas</p>', ['controller' => 'cursos', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']); ?></li>
<li class="nav-item"><?= $this->Html->link('<i class="fas fa-users"></i> <p>Alunos</p>', ['controller' => 'alunos', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']); ?></li>
<li class="nav-item"><?= $this->Html->link('<i class="fas fa-warehouse"></i> <p>Núcleos</p>', ['controller' => 'nucleos', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']); ?></li>
<li class="nav-item"><?= $this->Html->link('<i class="fas fa-list"></i> <p>Modalidades</p>', ['controller' => 'modalidades', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']); ?></li>
<li class="nav-item"><?= $this->Html->link('<i class="fas fa-users"></i> <p>Professores</p>', ['controller' => 'usuarios', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link']); ?></li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            Relatórios
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <?= $this->Html->link('<i class="far fa-circle nav-icon"></i> Aulas', ['controller' => 'relatorios', 'action' => 'cursos'], ['escape' => false, 'class' => 'nav-link']); ?>
            <?= $this->Html->link('<i class="far fa-circle nav-icon"></i> Alunos', ['controller' => 'relatorios', 'action' => 'alunos'], ['escape' => false, 'class' => 'nav-link']); ?>
        </li>
    </ul>
</li>