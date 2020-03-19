@echo off

set CURRENTDIR="%~dp0\"




@echo off

rem /* set CURRENTDIR="%~dp0\"  */
rem /*  phalcon model pre_faq_topic_recommend_relate --mapcolumn --force --extends="BaseModel" --namespace="X\Model" */
rem /* phalcon all-models --mapcolumn --force --doc --extends=s --get-set --schema=s --namespace=s */


phalcon all-models --force --extends="BaseModel" --namespace="SRVX\Model"