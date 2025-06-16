<html>
  <head></head>
  <body>
    <div id="styling"></div>
    <div id="app"></div>
  </body>
</html>

<script src="./faiframework/db/idbDB.js"></script>
<script src="./faiframework/utils/apiFetcher.js"></script>
<script src="./faiframework/core/MainLoaderData.js"></script>
<script src="./faiframework/core/InitialApp.js"></script>
<script src="./faiframework/core/App.js"></script>
<script src="./faiframework/core/controller/Database.js"></script>
<script src="./faiframework/core/controller/Partial.js"></script>
<script>
  base_url = "https://localhost/FrameworkServer_V1/";
  base_url_non_index = "https://localhost/FrameworkServer_V1/";
  const transaksiDB = "FaiDB_Transaksi_";
  const partial = new Partial();
  const config = {
    idbDB: window.idbDB,
    apiFetcher: window.apiFetcher,
    baseUrl: base_url,
    App: window.AppModule,
  };
  console.log(config);

  InitialApp.initialize('moesneeds.id', config)
    .then((result) => {
      console.log('App initialized:', result);
      document.getElementById('styling').innerHTML = (result.css);
      document.getElementById('app').innerHTML = (result.html);
      // document.getElementById('jsscript').innerHTML = eval(result.js);
      const container = document.createElement('div');
      container.innerHTML = result.js;

      const scripts = container.querySelectorAll('script');
      scripts.forEach(script => {
        const newScript = document.createElement('script');
        if (script.src) {
          newScript.src = script.src;
        } else {
          newScript.textContent = script.textContent;
        }
        document.body.appendChild(newScript);
      });
    }).catch(error => {
      console.error('Initialization error:', error);
    });;
</script>