<div class="menu_section">
    
    <br><br><br><br><br>
    
    <ul class="nav side-menu">
        <?php $droits = explode(",",Auth::user()->droits); ?>
        @if (in_array("gestion des blocs", $droits))
        <li><a href="/blocs" >
            <i class="fa fa-building"></i> Gestion des Blocs
        </a></li>
        @endif
        @if (in_array("gestion des chambres", $droits))
        <li><a href="/chambres" >
            <i class="fa fa-home"></i> Gestion des Chambres
        </a></li>
        @endif
        @if (in_array("gestion des dossiers", $droits))
        <li><a href="/inscriptions" >
            <i class="fa fa-file"></i> Gestion des Dossiers
        </a></li>
        @endif
        @if (in_array("gestion des residents", $droits))
        <li><a href="/internes" >
            <i class="fa fa-group"></i> Gestion des Résidents
        </a></li>
        @endif
        @if (in_array("gestion des regles", $droits))
        <li><a href="/regles" >
            <i class="fa fa-balance-scale"></i> Gestion des Régles
        </a></li>
        @endif
        @if (in_array("gestion des dates", $droits))
        <li><a href="/app" >
            <i class="fa fa-calendar"></i> Gestion des Dates
        </a></li>
        @endif

    </ul>
</div>