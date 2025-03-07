import { GridProps } from './types'

const Grid = ({ children }: GridProps) => {
  return (
    <div className="grid lg:grid-cols-3 grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2">
      {children}
    </div>
  )
}

export default Grid
