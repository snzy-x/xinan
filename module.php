<?php
 defined('IN_IA') or exit('Access Denied'); class baiban_wxlinksModule extends WeModule { public function settingsDisplay($config) { goto viEVZ; ChAo3: v6t7Y: goto PhQvC; viEVZ: global $_W, $_GPC; goto zf2hu; PhQvC: include $this->template('settings'); goto PXp0X; WtzpX: $config['expirejump'] = trim($_GPC['expirejump']); goto SxNI6; yZ0Wn: $this->saveSettings($config); goto jAADf; du7e0: $config['helpurl'] = trim($_GPC['helpurl']); goto WtzpX; SxNI6: $config['contact'] = trim($_GPC['contact']); goto IoP6D; IoP6D: $config['newh5'] = trim($_GPC['newh5']); goto yZ0Wn; zf2hu: if (!checksubmit('submit')) { goto v6t7Y; } goto du7e0; jAADf: message('设置成功！', 'referer', 'success'); goto ChAo3; PXp0X: } } ?>