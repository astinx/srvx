<?php
echo md5('content=test&sender=nee&time=12&uid=123456&key=e10adc3949ba59abbe56e057f20f883e');

echo file_get_contents('sms.log');