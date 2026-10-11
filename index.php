<?php
/**
 * FTP Minimal Archive // Lightweight Single-File Directory Browser
 * Author: Emanuele BDC (EmaF205)
 */
header('Content-Type: text/html; charset=utf-8');
$dir = __DIR__;
$files = array_diff(scandir($dir), ['.', '..', '.git', 'index.php', '.htaccess']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Minimal Archive Index</title>
  <style>
    :root { --bg: #0f1014; --card: #181a20; --border: #262933; --text: #eceef2; --dim: #8b92a5; --accent: #e63946; }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--bg); color: var(--text); font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; padding: 2rem 1rem; display: flex; justify-content: center; }
    .container { width: 100%; max-width: 720px; }
    header { margin-bottom: 2rem; border-bottom: 1px solid var(--border); padding-bottom: 1rem; }
    h1 { font-size: 1.4rem; font-weight: 700; letter-spacing: -0.02em; }
    p { color: var(--dim); font-size: 0.9rem; margin-top: 0.25rem; }
    .file-list { display: flex; flex-direction: column; gap: 0.5rem; }
    .file-item { display: flex; justify-content: space-between; align-items: center; background: var(--card); border: 1px solid var(--border); padding: 0.85rem 1.1rem; border-radius: 8px; text-decoration: none; color: var(--text); transition: border-color 0.2s, transform 0.2s; }
    .file-item:hover { border-color: var(--accent); transform: translateX(3px); }
    .name { font-weight: 600; font-size: 0.95rem; }
    .size { font-size: 0.8rem; color: var(--dim); font-family: monospace; }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>ARCHIVE INDEX</h1>
      <p>Clean, lightweight static repository and release browser.</p>
    </header>
    <div class="file-list">
      <?php if(empty($files)): ?>
        <p style="color:var(--dim); padding:1rem 0;">No archived files present in directory.</p>
      <?php else: foreach($files as $f): 
        $size = is_file($f) ? round(filesize($f)/1024, 1).' KB' : 'DIRECTORY';
      ?>
        <a href="<?= htmlspecialchars($f) ?>" class="file-item" download>
          <span class="name"><?= htmlspecialchars($f) ?></span>
          <span class="size"><?= $size ?></span>
        </a>
      <?php endforeach; endif; ?>
    </div>
  </div>
</body>
</html>
