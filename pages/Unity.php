<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | WebAR-CarController</title>
    <meta name="description" content="">
    <link rel="shortcut icon" href=<?= PROG ."TemplateData/favicon.ico"?>>
    <link rel="stylesheet" href=<?= PROG ."TemplateData/style.css"?>>
  </head>
  <body>
    <div id="unity-container">
      <div id="unity-canvas-container">
        <canvas id="unity-canvas" style="width: 100%; height: 100%;"></canvas>
      </div>
      <div id="unity-loading-bar">
        <div id="unity-logo"></div>
        <div id="unity-progress-bar-empty">
          <div id="unity-progress-bar-full"></div>
        </div>
      </div>
      <div id="unity-footer">
        <div id="unity-webgl-logo"></div>
        <button id="entervr" value="Enter VR" disabled>VR</button>
        <button id="enterar" value="Enter AR" disabled>AR</button>
        <div id="unity-webxr-link">Using <a href="https://github.com/De-Panther/unity-webxr-export" target="_blank" title="WebXR Export">WebXR Export</a></div>
        <div id="unity-build-title">WebAR-CarController</div>
      </div>
    </div>
    <script>
      var buildUrl = '<?= PROG ."Build"?>';
      var loaderUrl = buildUrl + "/build2AR.loader.js";
      var config = {
        dataUrl: buildUrl + "/build2AR.data",
        frameworkUrl: buildUrl + "/build2AR.framework.js",
        codeUrl: buildUrl + "/build2AR.wasm",
        streamingAssetsUrl: "StreamingAssets",
        companyName: "DefaultCompany",
        productName: "WebAR-CarController",
        productVersion: "0.1",
      };

      var container = document.querySelector("#unity-container");
      var canvas = document.querySelector("#unity-canvas");
      var canvasContainer = document.querySelector("#unity-canvas-container");
      var loadingBar = document.querySelector("#unity-loading-bar");
      var progressBarFull = document.querySelector("#unity-progress-bar-full");
      var fullscreenButton = document.querySelector("#unity-fullscreen-button");
      var unityInstance = null;
      

      canvasContainer.style.width = "960px";
      canvasContainer.style.height = "600px";
      loadingBar.style.display = "block";

      var script = document.createElement("script");
      script.src = loaderUrl;
      script.onload = () => {
        createUnityInstance(canvas, config, (progress) => {
          progressBarFull.style.width = 100 * progress + "%";
        }).then((instance) => {
          unityInstance = instance;
          loadingBar.style.display = "none";
          if (fullscreenButton)
          {
            fullscreenButton.onclick = () => {
              unityInstance.SetFullscreen(1);
            };
          }
        }).catch((message) => {
          alert(message);
        });
      };
      document.body.appendChild(script);

      let enterARButton = document.getElementById('enterar');
      let enterVRButton = document.getElementById('entervr');

      document.addEventListener('onARSupportedCheck', function (event) {
        enterARButton.disabled = !event.detail.supported;
      }, false);
      document.addEventListener('onVRSupportedCheck', function (event) {
        enterVRButton.disabled = !event.detail.supported;
      }, false);

      enterARButton.addEventListener('click', function (event) {
        unityInstance.Module.WebXR.toggleAR();
      }, false);
      enterVRButton.addEventListener('click', function (event) {
        unityInstance.Module.WebXR.toggleVR();
      }, false);
    </script>
  </body>
</html>
