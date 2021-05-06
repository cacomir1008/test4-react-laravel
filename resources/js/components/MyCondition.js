import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import styled from 'styled-components';
import { Box, Flex} from "@chakra-ui/react";

function MyCondition() {
    const [conditions, setConditions] = useState([]);

    // 画面が読み込まれたらgetする
    useEffect(() => {
        getMyConditions()
    },[])

    const getMyConditions = async () => {
        console.log("conURL",`/userinfo?api_token=${api_token}`)
        await axios
        .get(`api/conditions/userinfo?api_token=${api_token}`)
        .then( (res) => {
                console.log(res.data)
                    setConditions(res.data.data);
                    // response=> console.log('body:',response.data);
                    // response=> console.log('status:', response.status); // 200
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
                <dt>いつから感じたか</dt>
                <dd>{condition.start}</dd>
                <dt>いつ診断されたか</dt>
                <dd>{condition.diagnosis}</dd>
                <dt>今病院に通っているか</dt>
                <dd>{condition.hospital}</dd>
                <dt>コメント</dt>
                <dd>{condition.comment}</dd>
            </SDiv>
             )
             )
            }
        </Sdiv>
        )
}

// export default ConditionList;
const SDiv = styled.div`
    text-align:center;
    align-items: center;
    justify-content: center;
    min-height: 80vh;
    padding: 0.5rem 0.5rem;
    display: flex;
    flex-direction: column;
    border: 1px solid #efefef;
    border-radius: 40%;
    min-width: 200px;
    width:300px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.089);
`
const Sdiv = styled.div`
    display:flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    width:100%;
    max-width:1200px;
    margin:0 auto;
    padding:50px;
  `

if (document.getElementById('mycondition')) {
    ReactDOM.render(<MyCondition />, document.getElementById('mycondition'));
}
