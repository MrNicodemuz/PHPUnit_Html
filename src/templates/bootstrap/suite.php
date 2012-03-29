  <section class="box rounded suite <?php echo "suite-{$suiteno}".($suiteno % 1 ? ' odd' : ' even').($suiteno == ($numsuites - 1) ? ' last ' : ' ').$suite['status'].($suite['status'] !== 'passed' ? ' open' : ' closed'); ?>">
    <div class="icon"></div>
    <div class="name">
        <h1><?php echo htmlentities($suite['name']); ?></h1>
        <div class="stats"><?php $max_i = count($suite['stats']); $i = 1; foreach($suite['stats'] as $what => $count) { echo "<span class=\"{$what}\">".htmlentities(ucwords($what)).': <b>'.(int)$count.'</b>'.($i < $max_i ? ',' : '').'</span>'; $i++; }?></div>
        <div class="desc"><span class="assertions">Assertions: <b><?PHP echo (int)$suite['assertions'] ?></b>,</span><span class="problems">Problems: <b><?PHP echo $suite['deprecated'] + $suite['errors']; ?></b>,</span><span class="time">Executed in <?PHP printf('%06f', $suite['time']); ?> seconds.</span></div>
    </div>
    <div class="expand-button"></div>
    <div class="more tests">
      <?php
      $testno = 0;
      $numtests = count($suite['tests']);
      foreach($suite['tests'] as $testname => $test) {
        echo '<hr class="'.($testno == 0 ? 'big' : 'small').'">';
        include('test.php');
        $testno++;
      }
      ?>
    </div>
  </section>
