import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import styled from 'styled-components';
import { Box, Flex} from "@chakra-ui/react";

const ConditionThumb=({conditiondata_name,user_name,start,diagnosis,hospital,comment})=>{
    return(
        <SDiv>
        <div>
         <dt>症状名</dt>
                <dd>{conditiondata_name}</dd>
                <dt>ユーザー名</dt>
                <dd>{user_name}</dd>
                <dt>いつから感じたか</dt>
                <dd>{start}</dd>
                <dt>いつ診断されたか</dt>
                <dd>{diagnosis}</dd>
                <dt>今病院に通っているか</dt>
                <dd>{hospital}</dd>
                <dt>コメント</dt>
                <dd>{comment}</dd>
        </div>
        </SDiv>
        )
}

const SDiv = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 1.5rem 0 ;
  margin: 0.3rem;
  border: 1px solid #efefef;
  border-radius: 40%;
  min-width: 200px;
  width:300px;
  text-align: center;
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.089);
`
const Sdiv = styled.div`
    // display:flex;
    // flex-direction: column;
    // width:100%;
    // max-width:800px;
    // margin:0 auto;
    // padding:50px;
`
export default ConditionThumb;