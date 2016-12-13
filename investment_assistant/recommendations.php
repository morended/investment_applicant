<?php include("inc/header.php"); ?>

    <div id="wrapper">

      <section id="primary">

        <div id="" align="left">

          <form name="form2" method="post">

            <p>Welcome to the <b>Investment Assistant Portal!</b> The place for
              instant advice on current market trends. Use the options to
              select the stock from the list provided.</p>

            <h3>Select a Stock Symbol:</h3>

            <select name="symbol" onchange="showUser(this.value)">

              <option value="">---------</option>

              <option value="1">YHOO</option>

              <option value="2">GOOG</option>

              <option value="3">MSFT</option>

              <option value="4">AMZN</option>

              <option value="5">BAC</option>

            </select>

           </form>

        </div>

        <p>Dont trust <b>Investment Assistant?</b> A second opinion doesn't hurt. Check out here
          what other experts have to say!!</p>

        <div id="tools">

          <a href="https://robinhood.com" target="_blank">
            <img src="img/robinhood.jpg" alt="Robinhood Logo" height="80" width="80" />
          </a>

          <a href="https://www.betterment.com" target="_blank">
            <img src="img/betterment.png" alt="Betterment Logo" height="80" width="80" />
          </a>

          <a href="https://www.wealthfront.com" target="_blank">
            <img src="img/wealthfront.png" alt="Wealthfront Logo" height="80" width="80" />
          </a>

          <a href="https://openfolio.com" target="_blank">
            <img src="img/openfolio.png" alt="Openfolio Logo" height="80" width="80" />
          </a>

          <a href="https://www.estimize.com" target="_blank">
            <img src="img/estimize.png" alt="Estimize Logo" height="80" width="80" />
          </a>

        </div>

    </section>

    </div>

    <section id="secondary">

      <img src="img/recommend.png" alt="What We Recommend" height="315" width="550" />

    </section>

  </body>
</html>

<?php include("inc/footer.php"); ?>
