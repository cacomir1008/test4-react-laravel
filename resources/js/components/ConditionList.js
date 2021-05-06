import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import styled from 'styled-components';
import { Box, Flex} from "@chakra-ui/react";

import ConditionThumb  from "./ConditionThumb";

function ConditionList() {
    // 配列にする
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
        <SDiv>
        {conditions.map((condition) => (
        
        <ConditionThumb   
              key = {condition.id}
              conditiondata_name={condition.conditiondata_name}
              user_name={condition.user_name}
              start={condition.start}
              diagnosis={condition.diagnosis}
              hospital={condition.hospital}
              comment={condition.comment}
              />
             )
             )
            }
        </SDiv>
        )
}

// export default ConditionList;
 

const SDiv = styled.div`
　display:flex;
  flex-wrap: wrap;
  width:100%;
  max-width:1200px;
  margin:0 auto;
  align-items: center;
  justify-content: center;

`
if (document.getElementById('conditionlist')) {
    ReactDOM.render(<ConditionList />, document.getElementById('conditionlist'));
}
