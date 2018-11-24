
twigで作る
template engine切り替え処理をview/emitterに用意


<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="<?= $this->rootUrl; ?>/css/default.css">
<title><?= $title; ?></title>
</head>
<body>

<? require("{$this->contents}"); ?>

<script src="http://cdnjs.cloudflare.com/riot/3.13.1/riot.min.js"></script>





<script src="<?= $this->rootUrl; ?>/js/<?= $this->script; ?>"></script>
</body>
</html>
