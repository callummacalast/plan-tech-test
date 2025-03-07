import { createContext } from 'react'
import { IVideoBase } from '../definitions'

interface VideoContextType {
  videos: IVideoBase[] | null
  isLoading: boolean
  setIsLoading: (isLoading: boolean) => void
  fetchVideos: (search?: string) => Promise<void>
  setError: (error: string | null) => void
  error: string | null
}

export const VideoContext = createContext<VideoContextType | undefined>(
  undefined
)
