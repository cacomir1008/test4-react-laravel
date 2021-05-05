import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import styled from 'styled-components';
import { Box, Flex} from "@chakra-ui/react";

function ConditionList() {
    const [conditions, setConditions] = useState([]);

    // 画面が読み込まれたらgetする
    useEffect(() => {
        getAllConditions()
    },[])

    const getAllConditions = async () => {
        await axios
        .get('/api/allinfo')
        .then( (res) => {
                console.log(res.data)
                    setConditions(res.data.conditions);
                    response=> console.log('body:',response.data);
                    response=> console.log('status:', response.status); // 200
                }).catch(error => {
                     console.log('Error',error.response);
                         });
                }
    return(
        <Sdiv>
        {conditions.map((condition) => (
             <SDiv  key={condition.id}>
                <dt>症状名</dt>
                <dd>{condition.conditiondata_name}</dd>
                <dt>ユーザー名</dt>
                <dd>{condition.user_name}</dd>
                <dt>いつから感じたか</dt>
                <dd>{condition.start}</dd>
                <dt>いつ診断されたか</dt>
                <dd>{condition.diagnosis}</dd>
                <dt>今病院に通っているか</dt>
                <dd>{condition.hospital}</dd>
                <dt>コメント</dt>
                <dd>{condition.comment}</dd>
                <hr />
            </SDiv>
      
             )
             )
            }
        </Sdiv>
        )
}

// export default ConditionList;
const SDiv = styled.div`
    width:100%;
    text-align:center;
    align-items: center;
    justify-content: center;
    min-height: 80vh;
    padding: 0.5rem 0.5rem;
`
const Sdiv = styled.div`
    display:flex;
    flex-direction: column;
    width:100%;
    max-width:800px;
    margin:0 auto;
    padding:50px;
  `

if (document.getElementById('conditionlist')) {
    ReactDOM.render(<ConditionList />, document.getElementById('conditionlist'));
}
